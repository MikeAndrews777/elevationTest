
Answers to Elevation Coding Challenge for Mike Andrews





--------------------------------------

Coding Challenge

Task:
You will be taking a flat file (provided) and parsing the modified content onto a webpage in a table. All Information provided in the file should be displayed.
I want to see your thought process on how best to handle an incoming file and how you deal with the data.

Requirements:
• Use Laravel framework
• Display data from the file in an html table so that it is human readable at a glance.

Flat File Layout:
• All fields are separated by a semi colon ‘;’ There will be no semicolon after the final field
• Field 1- Account Number (10 digits long)
• Field 2- Request Type (1 digit long)

Code
Status

1
Active

2
Inactive

3
Pending


• Field 3- Account name (up to 20 Characters long)
• Field 4- Rate (4 characters long)
• Field 5- Effective Date (6 characters long)
• Field 6- Reason Code (1 character long)

Code
Reason

X
Customer Requested

R
Invalid Account

P
Account Pending Switch

U
Utility Requested

