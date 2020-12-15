import re
from flask import Flask, render_template_string, request

import templates.templates as tp

app = Flask(__name__)

def isParamLegal(param):
    return (re.search(r'{{.*}}|{%.*%}', param, re.M|re.S) is None)

@app.route('/') 
@app.route('/index.php') 
def main():
    indexTp = tp.head + tp.index + tp.foot
    return render_template_string(indexTp)

@app.route('/login.php', methods=["POST"])
def login():
    username = request.form.get('username')
    password = request.form.get('password')

    if(isParamLegal(username) and isParamLegal(password)):
        message = "Username:" + username + "&" + "Password:" + password
    else:
        message = "参数不合法"

    loginTmpTp = tp.head + tp.login + tp.foot
    loginTp = loginTmpTp % message

    return render_template_string(loginTp)

@app.route("/hint.php")
def hint():
    with open(__file__, "rb") as f:
        file = f.read()
    return file

if __name__ == '__main__':
    app.run(host="0.0.0.0")
