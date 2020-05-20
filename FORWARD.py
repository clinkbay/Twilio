from flask import Flask, request, redirect
import twilio.twiml
from twilio.rest import TwilioRestClient

account_sid = "AC1911566833dac6396c36777278aec6f4"
auth_token = "b5d613b8444697dbedaaad0041402b8d"
client = TwilioRestClient(account_sid, auth_token)

app = Flask(__name__)
 
@app.route("/", methods=['GET', 'POST'])



def sender():
     
    from_number = request.values.get('From', None)
    sms_body = request.values.get('Body', None)
    message = client.sms.messages.create(to="+212681196584", from_=from_number,
                                     body=sms_body)
    
 
if __name__ == "__main__":
    app.run(debug=True)