#Declarando un arreglo
numeros = [10,20,30,40,50]

#Imprimimos un elemento especifico del arreglo
print(numeros[2])

#Reasignamos un valor especifico del arreglo
numeros[3] = 35
print(numeros)

#Agregamos un nuevo valor al final del arreglo
numeros.append(60)
print(numeros)

#Elminamos un valor de un arreglo
numeros.remove(35)
print(numeros)

#Eliminamos un valor del arreglo usando la posicion
numeros.pop(4)
print(numeros)

frutas=["Manzana", "Fresa", "Sandia","Mango","Melon","Platano"]
frutas.pop(4)
print(frutas)

frutas.remove("Manzana")
print(frutas)