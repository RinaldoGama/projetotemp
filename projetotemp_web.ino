//Programa : Prototico de Estação de temperatura e Umidade
//Autor : Luiz Roberto Dias Jr e Rinaldo Gama
//Curso : Sistemas de Informação

#include <SPI.h>
#include <Ethernet.h>
#include <Adafruit_GFX.h>
#include <Adafruit_PCD8544.h>
#include <dht.h>


Adafruit_PCD8544 display = Adafruit_PCD8544(3, 4, 5, 6, 7);

// pin 8 - Serial clock out (SCLK)
// pin 9 - Serial data out (DIN)
// pin 10 - Select Data/Command (D/C)
// pin 11 - Select LCD chip (CS/CE)
// pin 12 - Reset LCD (RST)

#define dht_dpin A1 //Pino DATA do Sensor ligado na porta Analogica A1
dht DHT;

// A Placa de rede no Arquino UNO usa o seguintes 
// Pinos: 10 = CS, 11 = MOSI, 12 = MISO, 13 = SCK
// Define um endereço MAC para placa de rede do arduino
byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x02 };
IPAddress server(31,170,165,196); //IP servidor Externo

// Inicializa a placa de rede do Arduino

EthernetClient client;



// Variáveis que guardam a temperatura máxima e mínima
int max_temp = -100,min_temp = 100;

// Variáveis que guardam a umidade máxima e mínima 
int max_hum = -100, min_hum = 100; 
int temperatura,umidade;


void setup(){
  Serial.begin(9600);
  
  //Inicializa o envio de informações do display
  display.begin();
  display.setContrast(58); //Ajusta o contraste do display
  display.clearDisplay();   //Apaga o buffer e o display
  display.setTextSize(1);  //Seta o tamanho do texto

  // Retangulo temperatura
  display.drawRoundRect(0,0, 44,24, 3, 2);
  display.drawRoundRect(0,25, 84 ,23, 3, 2);

  // Retangulo humidade
  display.drawRoundRect(45,0, 39 ,24, 3, 2);
  display.display();

  if (Ethernet.begin(mac) == 0) {
    Serial.println("Falha conexão DHCP");
    // Exibi mensagem se não encontrar a conexão DHCP
    for(;;)
      ;
    }
    // Exibi as informações de rede atribuidas
  Serial.print("IP Rede -         : ");  
  Serial.println(Ethernet.localIP());
  Serial.print("Mascara de Rede   : ");
  Serial.println(Ethernet.subnetMask());
  Serial.print("IP Gateway        : ");
  Serial.println(Ethernet.gatewayIP());
  Serial.print("IP Servidor DNS   : ");
  Serial.println(Ethernet.dnsServerIP());
  delay(1000);
  Serial.println("conectando...");
  
}

void loop()
{
  DHT.read11(dht_dpin); //Lê as informações do sensor
  temperatura = DHT.temperature;
  umidade = DHT.humidity;

  //Armazena a temperatura máxima na variável max_temp
  if(temperatura > max_temp) {max_temp = temperatura;} 

  //Armazena a temperatura minima na variável min_temp
  if(temperatura < min_temp) {min_temp = temperatura;} 

  //Armazena a umidade máxima na variável max_hum
  if(umidade > max_hum) {max_hum = umidade;} 

  //Armazena a umidade minima na variável min_hum
  if(umidade < min_hum) {min_hum = umidade;} 

  


  display.setTextColor(BLACK,WHITE); //Seta a cor do texto
  display.setCursor(11,3);  //Seta a posição do cursor
  
  //mostra informações da Temperatura no display 
  display.print("TEMP");
  display.setCursor(12,14);  
  display.print(temperatura);
  display.setCursor(29,14);
  display.println("C");
  display.drawCircle(25, 14, 1,1); //desenha Simbolo °
  
  
  //mostra informações da Humidade no display 

  display.setCursor(52,3);
  display.print("UMID");
  display.setCursor(54,14);
  display.print(umidade);
  display.println(" %\n");

  //mostra o temperatura maxima
  display.setCursor(3,30);
  display.print("Max:");
  display.print(max_temp);
  display.drawCircle(40, 30, 1,1); //mostra o simbolo °
  display.setCursor(46,30);
  display.print("C/");

  //mostra o Humidade maxima
  display.print(max_hum);
  display.println(" %");
  display.setCursor(3,38);

  //mostra o Minimo de Temperatura minima
  display.print("Min:");
  display.print(min_temp);
  display.drawCircle(40, 38, 1,1); //mostra o simbolo °
  display.setCursor(47,38);
  display.print("C/");

  //mostra o Minimo de Minimo Humidade
  display.print(min_hum);
  display.println(" %");
  display.display();

  if (client.connect(server, 80)) {
    Serial.println("Conectado a servidor Web");
    // Envia Dados atraves do variavel que está no GET
    client.print("GET http://projetotemp.16mb.com/add_dados.php?");
    
    //Tranfere os dados da temperatura
    client.print("temp1=");
    client.print(temperatura);
    client.print("&&");
    client.print("um1=");
    client.print(umidade);
     
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println(server);
     
    //client.println("User-Agent: Arduino 1.0");
    client.println(); 
    client.println();
    
    //Mostra mensagem se conexão foi um sucesso
    Serial.println("Conexão com Sucesso. Dados Temperatura sendo enviados para o banco Mysql");
    //imprimi  na tela monitor serial
    Serial.print("Umidade = ");
    Serial.print(DHT.humidity);
    Serial.print(" %  ");
    Serial.print("Temperatura = ");
    Serial.print(DHT.temperature); 
    Serial.println(" Celsius  ");
  }
  else {
      Serial.println("Conexão Falhou"); 
    }
  client.stop();
  client.flush(); 

  delay(5000); //Aduarda 5 segundos e reinicia o processo
  
}


 
