#!/bin/bash

# Directorios
DEPLOYPATH="/home/gp3/git/Web-Barajitas"

# Crear directorio temporal
TEMPDEPLOY="/tmp/deploy"
mkdir -p $TEMPDEPLOY

# Copiar archivos al directorio temporal
cp index.php $TEMPDEPLOY/index.php
cp -r images $TEMPDEPLOY/

# Copiar archivos desde el directorio temporal al directorio de despliegue
cp -r $TEMPDEPLOY/* $DEPLOYPATH/

# Eliminar directorio temporal
rm -rf $TEMPDEPLOY

echo "Deployment completed successfully."
