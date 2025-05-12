import array
import string
import sys
from PySide6.QtUiTools import QUiLoader
from PySide6.QtWidgets import QApplication
from PySide6.QtCore import QFile, QIODevice
from numpy import number

window = None
prvni = ""
druhe = ""
operace = ""
memory = "0"

def process(symbol):
    global prvni
    global druhe
    global operace
    global window
    global memory
    
    if symbol in ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "."]:
        if operace == "":
            prvni += symbol
            window.vysledek.setText(prvni)
        else:
            druhe += symbol
            window.vysledek.setText(druhe)
            
    elif symbol == "-":
        if operace == "":
            if prvni == "":
                prvni = "-"
                window.vysledek.setText(prvni)
            elif prvni != "" and prvni != "-":
                operace = symbol
                window.vysledek.setText(operace)
        else:
            if druhe == "":
                druhe = "-"
                window.vysledek.setText(druhe)
                
    elif symbol in ["+", "*", "/"]:
        if prvni != "" and prvni != "-":
            operace = symbol
            window.vysledek.setText(operace)
            
    elif symbol == "=":
        if prvni != "" and druhe != "" and operace != "":
            try:
                num1 = float(prvni)
                num2 = float(druhe)
                result = 0
                if operace == "+":
                    result = num1 + num2
                elif operace == "-":
                    result = num1 - num2
                elif operace == "*":
                    result = num1 * num2
                elif operace == "/":
                    result = num1 / num2 if num2 != 0 else "Error"
                window.vysledek.setText(str(result))
                prvni = str(result)
                druhe = ""
                operace = ""
            except:
                window.vysledek.setText("Error")
                
    elif symbol == "C":
        prvni = ""
        druhe = ""
        operace = ""
        window.vysledek.setText("0")
        
    elif symbol == "MS":
        if prvni != "":
            memory = prvni if operace == "" else druhe
            window.vysledek.setText(memory)
            
    elif symbol == "MR":
        if operace == "":
            prvni = memory
        else:
            druhe = memory
        window.vysledek.setText(memory)

def num1_clicked(): process("1")
def num2_clicked(): process("2")
def num3_clicked(): process("3")
def num4_clicked(): process("4")
def num5_clicked(): process("5")
def num6_clicked(): process("6")
def num7_clicked(): process("7")
def num8_clicked(): process("8")
def num9_clicked(): process("9")
def num0_clicked(): process("0")
def nump_clicked(): process("+")
def numm_clicked(): process("-")
def numk_clicked(): process("*")
def numd_clicked(): process("/")
def equal_clicked(): process("=")
def dot_clicked(): process(".")
def clear_clicked(): process("C")
def memory_save_clicked(): process("MS")
def memory_recall_clicked(): process("MR")

if __name__ == "__main__":
    app = QApplication(sys.argv)

    ui_file_name = "kalkulacka.ui"
    ui_file = QFile(ui_file_name)
    if not ui_file.open(QIODevice.ReadOnly):
        print(f"Cannot open {ui_file_name}: {ui_file.errorString()}")
        sys.exit(-1)
    loader = QUiLoader()
    window = loader.load(ui_file)
    
    window.num1.clicked.connect(num1_clicked)
    window.num2.clicked.connect(num2_clicked)
    window.num3.clicked.connect(num3_clicked)
    window.num4.clicked.connect(num4_clicked)
    window.num5.clicked.connect(num5_clicked)
    window.num6.clicked.connect(num6_clicked)
    window.num7.clicked.connect(num7_clicked)
    window.num8.clicked.connect(num8_clicked)
    window.num9.clicked.connect(num9_clicked)
    window.num0.clicked.connect(num0_clicked)
    window.nump.clicked.connect(nump_clicked)
    window.numm.clicked.connect(numm_clicked)
    window.numk.clicked.connect(numk_clicked)
    window.numd.clicked.connect(numd_clicked)
    window.pushButton_14.clicked.connect(equal_clicked)
    window.pushButton_15.clicked.connect(dot_clicked)
    window.pushButton_19.clicked.connect(clear_clicked)
    window.pushButton_18.clicked.connect(memory_save_clicked)
    window.pushButton_17.clicked.connect(memory_recall_clicked)
    
    ui_file.close()
    if not window:
        print(loader.errorString())
        sys.exit(-1)
    window.show()

    sys.exit(app.exec())