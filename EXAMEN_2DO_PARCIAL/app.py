
from flask import Flask, render_template, request, redirect, url_for
import mysql.connector

app = Flask(__name__)
app.secret_key = 'papeleria123'

def conectar():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="crud_papeleria"
    )

@app.route('/')
def inicio():
    conexion = conectar()
    cursor = conexion.cursor(dictionary=True)

    cursor.execute("SELECT * FROM productos")
    productos = cursor.fetchall()

    cursor.close()
    conexion.close()

    return render_template('index.html', productos=productos)


@app.route('/guardar', methods=['POST'])
def guardar():
    nombre = request.form['nombre']
    descripcion = request.form['descripcion']
    precio = request.form['precio']
    stock = request.form['stock']

    conexion = conectar()
    cursor = conexion.cursor()

    cursor.execute(
        "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (%s, %s, %s, %s)",
        (nombre, descripcion, precio, stock)
    )

    conexion.commit()
    cursor.close()
    conexion.close()

    return redirect(url_for('inicio'))


@app.route('/editar/<int:id>')
def editar(id):
    conexion = conectar()
    cursor = conexion.cursor(dictionary=True)

    cursor.execute("SELECT * FROM productos WHERE id = %s", (id,))
    producto = cursor.fetchone()

    cursor.close()
    conexion.close()

    return render_template('editar.html', producto=producto)


@app.route('/actualizar/<int:id>', methods=['POST'])
def actualizar(id):
    nombre = request.form['nombre']
    descripcion = request.form['descripcion']
    precio = request.form['precio']
    stock = request.form['stock']

    conexion = conectar()
    cursor = conexion.cursor()

    cursor.execute(
        "UPDATE productos SET nombre=%s, descripcion=%s, precio=%s, stock=%s WHERE id=%s",
        (nombre, descripcion, precio, stock, id)
    )

    conexion.commit()
    cursor.close()
    conexion.close()
    return redirect(url_for('inicio'))


@app.route('/eliminar/<int:id>')
def eliminar(id):
    conexion = conectar()
    cursor = conexion.cursor(dictionary=True)

    cursor.execute("SELECT * FROM productos WHERE id = %s", (id,))
    producto = cursor.fetchone()

    cursor.close()
    conexion.close()

    return render_template('eliminar.html', producto=producto)


@app.route('/borrar/<int:id>', methods=['POST'])
def borrar(id):
    conexion = conectar()
    cursor = conexion.cursor()

    cursor.execute("DELETE FROM productos WHERE id = %s", (id,))

    conexion.commit()
    cursor.close()
    conexion.close()

    return redirect(url_for('inicio'))


if __name__ == '__main__':
    app.run(debug=True)
