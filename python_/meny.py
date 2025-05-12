import pandas as pd

if __name__ == "__main__":
    try:
        df = pd.read_excel('meny_staty.xlsx')

        pocet = df.groupby('stát')['měna'].count().reset_index()
        pocet.columns = ['stát', 'počet měn']
        print("Počet měn ve státech")
        print(pocet.to_string(index=False))

        df['aktualizace kurzu'] = pd.to_datetime(df['aktualizace kurzu'])
        cas = df['aktualizace kurzu'].dt.time.value_counts().reset_index()
        cas.columns = ['Čas', 'počet']
        print(cas)


        datum = pd.to_datetime(df['aktualizace kurzu']).dt.date.value_counts()
        print(datum)

        res = (df['Zkratka'] == df['Zkratka2']).sum()
        print(res)

        

    except Exception as e:
        print(f"Došlo k chybě při spuštění programu." + str(e))