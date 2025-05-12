class Converter:
    
    @staticmethod
    def convert(value: float, from_unit: str, to_unit: str, density: float):
        from_unit = from_unit.lower()
        to_unit = to_unit.lower()
        
        match from_unit:
            case "kg":
                match to_unit:
                    case "kg":
                        vysledek = value
                    case "g":
                        vysledek = value*1000
                    case "l":
                        vysledek = value/density
                    case "ml":
                        vysledek = value*1000/density
            case "g":
                match to_unit:
                    case "kg":
                        vysledek = value/1000
                    case "g":
                        vysledek = value
                    case "l":
                        vysledek = value/1000/density
                    case "ml":
                        vysledek = value/density
            case "l":
                match to_unit:
                    case "kg":
                        vysledek = value*density
                    case "g":
                        vysledek = value*1000*density
                    case "l":
                        vysledek = value
                    case "ml":
                        vysledek = value*1000
            case "ml":
                match to_unit:
                    case "kg":
                        vysledek = value/1000*density
                    case "g":
                        vysledek = value*density
                    case "l":
                        vysledek = value/1000
                    case "ml":
                        vysledek = value
                        
        if value < 10:
            return round(vysledek, 4)
        else:
            return round(vysledek, 2)