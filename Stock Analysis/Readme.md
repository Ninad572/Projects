![s1](https://github.com/Ninad572/Projects/assets/99063627/d20f47eb-787a-4171-bed4-2c788c80da0a)
![s2](https://github.com/Ninad572/Projects/assets/99063627/2c2171e2-a133-426a-bdeb-d0f6a66bc2ea)
![s3](https://github.com/Ninad572/Projects/assets/99063627/f2e447f2-8e90-4e3e-b41e-d7fc51a30458)
![s4](https://github.com/Ninad572/Projects/assets/99063627/8969360f-5110-49c4-9d81-8f6bb75c3f71)
![s5](https://github.com/Ninad572/Projects/assets/99063627/ccfe7d39-c3ad-4901-9aff-dce3407106ac)

"Stock Analysis App"

This is a simple web application built with Streamlit that allows you to perform stock analysis for popular tickers. The application provides various functionalities, including retrieving stock information, financial ratios, income statements, balance sheets, cash flow statements, and the latest news related to a specific stock ticker.

"Prerequisites"
Before running the application, make sure you have the following dependencies installed:

streamlit
requests
yfinance
pandas
matplotlib
beautifulsoup4
textblob
You can install them using pip:


pip install streamlit requests yfinance pandas matplotlib beautifulsoup4 textblob
Getting Started
To use the application, follow these steps:

"Clone the repository:"

bash
git clone https://github.com/your-username/stock-analysis-app.git
cd stock-analysis-app

"Run the app:"
bash
streamlit run app.py
Functionality
The application allows you to:

Select a stock ticker from the list of popular stock tickers in the sidebar.
Retrieve stock information, financial ratios, income statements, balance sheets, and cash flow statements by clicking on the respective buttons.
View the market price chart for the selected stock.
Usage
Open the application in your web browser after running it with streamlit run app.py.
In the sidebar, you will find a list of popular stock tickers. Select one by clicking on it or enter a custom stock ticker in the text input box.
Click on the buttons provided to retrieve the desired information about the stock.
The application will display the relevant information and visualizations.

Please remember to use your own API keys if required (e.g., NewsAPI and Alpha Vantage) in the respective sections of the code.

"Acknowledgments"
The application uses data from Alpha Vantage and NewsAPI to provide financial and news information. Special thanks to these services for providing valuable data to developers.

"Disclaimer"
This application is for educational and informational purposes only. The stock data and information provided by this app may not be accurate and should not be considered as financial advice. Always do your own research and consult with a qualified financial advisor before making any investment decisions.
