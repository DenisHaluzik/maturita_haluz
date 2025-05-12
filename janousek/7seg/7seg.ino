int sega=2;
int segb=3;
int segc=4;
int segd=5;
int sege=6;
int segf=7;
int segg=8;

int count=0;

void setup() 
{
  for(int i=2;i<9;i++)
  {
    pinMode(i, OUTPUT);
  }
}

void loop() 
{
      digitalWrite(sega, LOW);
      digitalWrite(segb, LOW);
      digitalWrite(segc, LOW);
      digitalWrite(segd, LOW);
      digitalWrite(sege, LOW);
      digitalWrite(segf, LOW);
      digitalWrite(segg, LOW);
  for (count = 0;count <=9;++count)
  {
    if(count ==0)
    {
      digitalWrite(sega, HIGH);
      digitalWrite(segb, HIGH);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, HIGH);
      digitalWrite(sege, HIGH);
      digitalWrite(segf, HIGH);
      digitalWrite(segg, LOW);
    }
    if(count ==1)
    {
      digitalWrite(sega, LOW);
      digitalWrite(segb, HIGH);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, LOW);
      digitalWrite(sege, LOW);
      digitalWrite(segf, LOW);
      digitalWrite(segg, LOW);
    }
    if(count ==2)
    {
      digitalWrite(sega, HIGH);
      digitalWrite(segb, HIGH);
      digitalWrite(segc, LOW);
      digitalWrite(segd, HIGH);
      digitalWrite(sege, HIGH);
      digitalWrite(segf, LOW);
      digitalWrite(segg, HIGH);
    }
    if(count ==3)
    {
      digitalWrite(sega, HIGH);
      digitalWrite(segb, HIGH);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, HIGH);
      digitalWrite(sege, LOW);
      digitalWrite(segf, LOW);
      digitalWrite(segg, HIGH);
    }
    if(count ==4)
    {
      digitalWrite(sega, LOW);
      digitalWrite(segb, HIGH);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, LOW);
      digitalWrite(sege, LOW);
      digitalWrite(segf, HIGH);
      digitalWrite(segg, HIGH);
    }
    if(count ==5)
    {
      digitalWrite(sega, HIGH);
      digitalWrite(segb, LOW);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, HIGH);
      digitalWrite(sege, LOW);
      digitalWrite(segf, HIGH);
      digitalWrite(segg, HIGH);
    }
    if(count ==6)
    {
      digitalWrite(sega, HIGH);
      digitalWrite(segb, LOW);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, HIGH);
      digitalWrite(sege, HIGH);
      digitalWrite(segf, HIGH);
      digitalWrite(segg, HIGH);
    }
    if(count ==7)
    {
      digitalWrite(sega, HIGH);
      digitalWrite(segb, HIGH);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, LOW);
      digitalWrite(sege, LOW);
      digitalWrite(segf, LOW);
      digitalWrite(segg, LOW);
    }
    if(count ==8)
    {
      digitalWrite(sega, HIGH);
      digitalWrite(segb, HIGH);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, HIGH);
      digitalWrite(sege, HIGH);
      digitalWrite(segf, HIGH);
      digitalWrite(segg, HIGH);
    }
    if(count ==9)
    {
      digitalWrite(sega, HIGH);
      digitalWrite(segb, HIGH);
      digitalWrite(segc, HIGH);
      digitalWrite(segd, LOW);
      digitalWrite(sege, LOW);
      digitalWrite(segf, HIGH);
      digitalWrite(segg, HIGH);
    }
    delay (1000);

  }
  if (count ==10)
  {
    count =0;
  }
}
