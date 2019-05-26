# Relayr_case_study
Helmchart case study for Relayr

Problem Statement: 
===================
*Tools**

Tools to use: minikube, not hosted k8s.

**Objective**

Create an application that reads a string from a database and serves it via HTTP. 
Application should be accessible from the outside of kubernetes.
Create a helm chart for such application.

Database data volume should be persistent.
Database usernames and passwords should not be hardcoded in application code.

Application needs to discover database using kubernetes native features.

**Solution**


Provide a link to repository which has:

application code
helm chart
docker files
readme
**How it will be tested**

We expect a readme which lists all the required commands to run your app locally in minicube.
We start minucube and access the application from a browser.
