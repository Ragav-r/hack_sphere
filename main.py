from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('login_form.html')

@app.route('/login', methods=['POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        # Here you can implement your login logic, such as checking the username and password in the database
        # For this example, I'm just redirecting to a success page
        return redirect(url_for('success'))

@app.route('/success')
def success():
    return 'Login successful!'

if __name__ == '__main__':
    app.run(debug=True)
