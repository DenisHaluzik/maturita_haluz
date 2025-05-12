import sys
from PySide6.QtUiTools import QUiLoader
from PySide6.QtWidgets import QApplication, QMessageBox
from PySide6.QtCore import QFile, QIODevice



class Calculator:

    def fire_app(self):
        if __name__ == "__main__":
            app = QApplication(sys.argv)

            ui_file_name = "calc.ui"
            ui_file = QFile(ui_file_name)
        if not ui_file.open(QIODevice.ReadOnly):
            self.show_message_box("Nepodařilo se načíst soubor.")
            sys.exit(-1)

        loader = QUiLoader()
        self.__window = loader.load(ui_file)
        ui_file.close()

        if not self.__window:
            self.show_message_box("Nepodařilo se načíst soubor.")
            sys.exit(-1)

        self.__window.show()
        self.__window.setStyleSheet("""
    QWidget {
        background-color: #121212;
        color: #ffffff;
        font-family: 'Roboto Mono';
        font-size: 16px;
    }

    QPushButton {
        background-color: #1e1e1e;
        border: 1px solid #333;
        border-radius: 6px;
        padding: 10px;
    }

    QPushButton:hover {
        background-color: #2c2c2c;
    }

    QPushButton:pressed {
        background-color: #3a3a3a;
    }

    QTextEdit {
        background-color: #1a1a1a;
        border: none;
        padding: 10px;
        font-size: 20px;
    }
""")
        self.__window.pushButton_1.clicked.connect(lambda: self._vypis_cisla("1"))
        self.__window.pushButton_2.clicked.connect(lambda: self._vypis_cisla("2"))
        self.__window.pushButton_3.clicked.connect(lambda: self._vypis_cisla("3"))
        self.__window.pushButton_4.clicked.connect(lambda: self._vypis_cisla("4"))
        self.__window.pushButton_5.clicked.connect(lambda: self._vypis_cisla("5"))
        self.__window.pushButton_6.clicked.connect(lambda: self._vypis_cisla("6"))
        self.__window.pushButton_7.clicked.connect(lambda: self._vypis_cisla("7"))
        self.__window.pushButton_8.clicked.connect(lambda: self._vypis_cisla("8"))
        self.__window.pushButton_9.clicked.connect(lambda: self._vypis_cisla("9"))
        self.__window.pushButton_0.clicked.connect(lambda: self._vypis_cisla("0"))
        self.__window.pushButton_s.clicked.connect(lambda: self._vypis_cisla("+"))
        self.__window.pushButton_m.clicked.connect(lambda: self._vypis_cisla("-"))
        self.__window.pushButton_d.clicked.connect(lambda: self._vypis_cisla("/"))
        self.__window.pushButton_n.clicked.connect(lambda: self._vypis_cisla("*"))
        self.__window.pushButton_carka.clicked.connect(lambda: self._vypis_cisla("."))
        self.__window.pushButton_clear.clicked.connect(self._clear_all)
        self.__window.pushButton_equal.clicked.connect(self._calculate)
        self.__window.pushButton_save.clicked.connect(self._uloz_pamet)
        self.__window.pushButton_read.clicked.connect(self._vloz_pamet)
        self.__window.pushButton_mClear.clicked.connect(self._smaz_pamet)
        sys.exit(app.exec())
        

        self._pamet = None

    def _uloz_pamet(self):
            hodnota = str(self.__window.textEdit.toPlainText())
            self._pamet = hodnota


    def _vloz_pamet(self):
        if self._pamet is not None:
            current_number = self.__window.textEdit.toPlainText()
            self.__window.textEdit.setText(current_number + str(self._pamet))
        else:
            self.__window.textEdit.setText("Žádná hodnota v paměti!")

    def _smaz_pamet(self):
        self._pamet = None
        self.__window.textEdit.setText("Paměť smazána!")

    def _vypis_cisla(self, symbol):
        zobrazeno = self.__window.textEdit.toPlainText()
        self.__window.textEdit.setText(zobrazeno + symbol)

    def _clear_all(self):
        self.__window.textEdit.setText("")
    
    def _calculate(self):
            vyraz = self.__window.textEdit.toPlainText()
            if '/0' in vyraz:
                self.__window.textEdit.setText("Nelze dělit nulou!")
                
            vysledek = str(eval(vyraz))
            self.__window.textEdit.setText(vysledek)

    def show_message_box(self, message):
        varovaci_okynko = QMessageBox()
        varovaci_okynko.setIcon(QMessageBox.Icon.Warning)
        varovaci_okynko.setText("Nespouštíš správnej soubor troubo!")
        varovaci_okynko.setWindowTitle("Jseš GUMA!")
        varovaci_okynko.setStandardButtons(QMessageBox.StandardButton.Ok | QMessageBox.StandardButton.Cancel)
        varovaci_okynko.exec()
        print(message)

if __name__ == "__main__":
    calculator = Calculator()
    calculator.fire_app()