#importamos a libreria de flask
from flask import Flask, redirect, render_template

#creamos una instancia del proyecto
app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True

#creacion de rutas

#Ruta razin
@app.route("/")
def home():
    #Retorna mensaje
    return render_template("index.html")

@app.route("/guardar")
def guardar():
    return "Prducto agregado correctamente!"

@app.route("/login")
def login():
    return render_template("login.html")

@app.route("/logout")
def logout():
    return redirect("login")

#Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000, debug=True)