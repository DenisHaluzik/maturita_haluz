import sys
from PySide6.QtUiTools import QUiLoader
from PySide6.QtWidgets import QApplication, QMessageBox
from PySide6.QtCore import QFile, QIODevice
from converter import Converter

class App():

    def __init__(self) -> None:
        self._window = None

    def fire_app(self) -> None:
        app = QApplication(sys.argv)

        ui_file_name = "C:\\Users\\haluz\\Desktop\\maturita\\python\\untitled.ui"
        ui_file = QFile(ui_file_name)
        if not ui_file.open(QIODevice.ReadOnly):
            self.show_error_dialog("Nepodařilo se načíst šablonu UI.")
            sys.exit(-1)
    
        loader = QUiLoader()
        self._window = loader.load(ui_file) 
        ui_file.close()
    
        if not self._window:
            self.show_error_dialog("Nepodařilo se načíst uživatelské okno.")
            sys.exit(-1)
    
        self._window.calcBtn.clicked.connect(self.handle_calculation)   
        self._window.show()
        sys.exit(app.exec())

    def handle_calculation(self):
        try:
            value = float(self._window.textEdit.toPlainText())
            from_unit = self._window.comboBox.currentText()
            to_unit = self._window.comboBox_2.currentText()
            hustota = self._window.comboBox_3.currentText()
            
            hustoty = {
                "voda": 1,
                "petrolej": 0.8,
                "benzin": 0.75,
                "nafta": 0.84,
                "aceton": 0.784
            }
            
            density = float(hustoty[hustota])
            
            result = Converter.convert(value, from_unit, to_unit, density)
            
            self._window.lineEdit_2.setText(str(result)) 

        except ValueError:
            self.show_error_dialog2("Zadejte číselnou hodnotu!")   

    def show_error_dialog(self, error_message):
        msg = QMessageBox()
        msg.setIcon(QMessageBox.Icon.Warning)
        msg.setText("Nepodařilo se načíst grafický soubor")
        msg.setWindowTitle("Warning MessageBox")
        msg.setStandardButtons(QMessageBox.StandardButton.Ok)
        retval = msg.exec()

    def show_error_dialog2(self, error_message):
        msg = QMessageBox()
        msg.setIcon(QMessageBox.Icon.Warning)
        msg.setText("Zadejte prosím číselnou hodnotu")
        msg.setWindowTitle("Warning MessageBox")
        msg.setStandardButtons(QMessageBox.StandardButton.Ok)
        msg.exec()

if __name__ == "__main__":
    app = App()
    app.fire_app()