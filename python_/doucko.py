import pandas as pd

if __name__ == "__main__":
    try:
        df = pd.read_excel('mesta-staty.xlsx')

        ulice = df['Město'].value_counts().reset_index()
        print(ulice)


        mesta = df.groupby('Stát')['Město'].nunique().reset_index()
        print(mesta)

    except Exception as e:
        print(f"Došlo k chybě při spuštění programu." + str(e))