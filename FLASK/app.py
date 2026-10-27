
# Importamos librerías de Flask
from flask import Flask, redirect, render_template, request, url_for

# Importamos la librería de MySQL para Flask
from flask_mysqldb import MySQL

# Importamos librerías para generar y comprobar hashes
from werkzeug.security import generate_password_hash, check_password_hash

app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True

# Configuración de la conexión
app.config["MYSQL_HOST"] = "localhost"
app.config["MYSQL_USER"] = "root"
app.config["MYSQL_PASSWORD"] = ""
app.config["MYSQL_DB"] = "flaskdb"
app.secret_key = "mysecretkey"
mysql = MySQL(app)


@app.route("/")
def home():
    return render_template("login.html")


@app.route("/registro", methods=["GET", "POST"])
def registro():
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password_hash"]
        id_rol = request.form["id_rol"]

        # Generamos el hash de la contraseña
        password_hash = generate_password_hash(password)

        cursor = mysql.connection.cursor()

        # Verificamos si el usuario ya existe
        cursor.execute(
            "SELECT id FROM usuarios WHERE correo = %s",
            (correo,)
        )

        if cursor.fetchone():
            cursor.close()
            return render_template("registro.html")

        # Insertamos el nuevo usuario
        cursor.execute(
            """INSERT INTO usuarios
            (nombre, apellido_p, apellido_m, correo, password_hash, id_rol)
            VALUES (%s, %s, %s, %s, %s, %s)""",
            (
                nombre,
                apellido_p,
                apellido_m,
                correo,
                password_hash,
                id_rol
            )
        )

        # Confirmamos los cambios y cerramos
        mysql.connection.commit()
        cursor.close()

        return redirect(url_for("home"))

    return render_template("registro.html")


if __name__ == "__main__":
    app.run(port=5000, debug=True)
