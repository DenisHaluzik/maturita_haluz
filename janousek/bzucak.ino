void setup() {
  // put your setup code here, to run once:
  pinMode(8, OUTPUT);
  pinMode(9, INPUT_PULLUP);
  pinMode(10, INPUT_PULLUP);
}

void loop() {
  // put your main code here, to run repeatedly:
  if (digitalRead(9) == LOW & digitalRead(10) == LOW){
    tone(8, 100);
  }
  else{
    noTone(8);
  }
}
