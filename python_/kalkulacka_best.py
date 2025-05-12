import sys
from PySide6.QtUiTools import QUiLoader
from PySide6.QtWidgets import QApplication, QMessageBox
from PySide6.QtCore import QFile, QIODevice

class Calculator:

    def __init__(self):
        self.cislo = ""
        self.ms = ""

    def fire_app(self):
        app = QApplication(sys.argv)

        ui_file_name = "kalkulacka.ui"
        ui_file = QFile(ui_file_name)
        if not ui_file.open(QIODevice.ReadOnly):
            self.show_message_box(f"Nelze otevřít {ui_file_name}: {ui_file.errorString()}")
            sys.exit(-1)
        loader = QUiLoader()
        self.__window = loader.load(ui_file)
        ui_file.close()
        if not self.__window:
            print(loader.errorString())
            sys.exit(-1)
        self.__window.show()
        
        self.__window.zero.clicked.connect(lambda: self.pridat_cislo("0"))
        self.__window.one.clicked.connect(lambda: self.pridat_cislo("1"))
        self.__window.two.clicked.connect(lambda: self.pridat_cislo("2"))
        self.__window.three.clicked.connect(lambda: self.pridat_cislo("3"))
        self.__window.four.clicked.connect(lambda: self.pridat_cislo("4"))
        self.__window.five.clicked.connect(lambda: self.pridat_cislo("5"))
        self.__window.six.clicked.connect(lambda: self.pridat_cislo("6"))
        self.__window.seven.clicked.connect(lambda: self.pridat_cislo("7"))
        self.__window.eight.clicked.connect(lambda: self.pridat_cislo("8"))
        self.__window.nine.clicked.connect(lambda: self.pridat_cislo("9"))
        self.__window.dot.clicked.connect(lambda: self.pridat_cislo("."))

        self.__window.plus.clicked.connect(lambda: self.clicked_znak("+"))
        self.__window.minus.clicked.connect(lambda: self.clicked_znak("-"))
        self.__window.mul.clicked.connect(lambda: self.clicked_znak("*"))
        self.__window.div.clicked.connect(lambda: self.clicked_znak("/"))

        self.__window.clear.clicked.connect(self.clicked_clear)

        self.__window.ms.clicked.connect(self.clicked_ms)
        self.__window.mr.clicked.connect(self.clicked_mr)

        self.__window.equals.clicked.connect(self.clicked_equals)

        self.__window.borec.clicked.connect(self.clicked_borec)

        sys.exit(app.exec())

    def pridat_cislo(self, cislice):
        self.__window.textEdit.setText(self.__window.textEdit.toPlainText() + cislice)
        self.cislo += cislice

    def clicked_znak(self, znak):
        self.__window.textEdit.setText(self.__window.textEdit.toPlainText() + znak)
        self.cislo += znak

    def clicked_clear(self):
        self.__window.textEdit.clear()
        self.cislo = ""

    def clicked_ms(self):
        try:
            if self.cislo != "":
                self.__window.textEdit.clear()
                self.__window.textEdit.setText(self.__window.textEdit.toPlainText() + "MS")
                self.clicked_equals()
                self.ms = self.cislo
                self.show_message_box(f"Číslo {self.ms} bylo uloženo do paměti")
            else:
                self.show_message_box("ERROR: Nic k uložení")
        except:
            self.show_message_box("ERROR: Nelze uložit")
            self.clicked_clear()

    def clicked_mr(self):
        if self.ms == "":
            self.show_message_box("Paměť je prázdná")
        else:
            self.__window.textEdit.setText(self.__window.textEdit.toPlainText() + self.ms)
            self.cislo += self.ms

    def clicked_equals(self):
        if ("++" in self.cislo) or ("--" in self.cislo) or ("***" in self.cislo) or ("///" in self.cislo):
            self.show_message_box("ERROR: Nezadávejte více operací za sebou nebo teček za sebou")
            self.clicked_clear()
        else:
            if self.cislo[-1] in ["+", "-", "*", "/"]:
                self.cislo = self.cislo[:-1]
                self.clicked_equals()
            elif self.cislo[0] in ["*", "/", "."]:
                self.cislo = self.cislo[1:]
                self.clicked_equals()
            else:
                try:
                    self.cislo = eval(self.cislo)
                    self.__window.textEdit.setText(str(self.cislo))
                    self.cislo = str(self.cislo)
                except ZeroDivisionError:
                    self.show_message_box("ERROR: Nelze dělit nulou")
                    self.clicked_clear()
                except SyntaxError:
                    self.show_message_box("ERROR: Špatný vstup")
                    self.clicked_clear()

    def clicked_borec(self):
        self.show_message_box("Tak ty jsi borec, že si na tohle tlačítko klikl!!!")

    def show_message_box(self, message):
        msgBox = QMessageBox()
        msgBox.setIcon(QMessageBox.Warning)
        msgBox.setText(message)
        msgBox.setStandardButtons(QMessageBox.Close)
        msgBox.exec()

if __name__ == "__main__":
    calculator = Calculator()
    calculator.fire_app()