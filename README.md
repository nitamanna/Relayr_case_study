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



Detail Implementation Steps below:
#####################################

Step1. Download/clone/fork the below Github Repository
#################################
https://github.com/nitamanna/Relayr_case_study.git


Step 2. Install and configure kubectl
######################

In this step we need to install kubectl, if your machine already has kubectl installed then you can skip this step. Else follow the link below

https://kubernetes.io/docs/tasks/tools/install-kubectl/ 

In my case I have used ubuntu 18.04 LTS (HVM) SSD t2.medium EC2 instance and below is the step,

curl -LO https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl
chmod +x ./kubectl
sudo mv ./kubectl /usr/local/bin/kubectl


Step 3. Install and configure docker
######################

In this step we need to install docker, if your machine already has docker installed then you can skip this step. Else follow the link below

https://docs.docker.com/v17.12/install/

In my case I have used ubuntu 18.04 LTS (HVM) SSD t2.medium EC2 instance and below is the step,

sudo apt-get update && \
    sudo apt-get install docker.io -y
    

Step 4. Install and configure Minikube
#######################

In this step we need to install Minikube, if your machine already has Minikube installed then you can skip this step. Else follow the link below

https://kubernetes.io/docs/tasks/tools/install-minikube/

In my case I have used ubuntu 18.04 LTS (HVM) SSD t2.medium EC2 instance and below is the step,

curl -Lo minikube https://storage.googleapis.com/minikube/releases/latest/minikube-linux-amd64 && chmod +x minikube && sudo mv minikube /usr/local/bin/


Step 5. Install and configure socat
######################

In this step we need to install socat, if your machine already has socat installed then you can skip this step. Else follow the link below

http://www.dest-unreach.org/socat/

In my case I have used ubuntu 18.04 LTS (HVM) SSD t2.medium EC2 instance and below is the step,

sudo apt-get install -y socat


Step 6. Run Minikube
##############

minikube start --vm-driver=none

Step 7. Check minikube status
##################
minikube status

Step 8. Install Helm
#############
curl https://raw.githubusercontent.com/kubernetes/helm/master/scripts/get > get_helm.sh
chmod 700 get_helm.sh
./get_helm.sh
helm init

Step 9. Create Service Account for tiller
#########################

kubectl create serviceaccount --namespace kube-system tiller
kubectl create clusterrolebinding tiller-cluster-rule --clusterrole=cluster-admin --serviceaccount=kube-system:tiller
kubectl patch deploy --namespace kube-system tiller-deploy -p '{"spec":{"template":{"spec":{"serviceAccount":"tiller"}}}}'

Step 10. Create and install Helm Chart
######################

helm create nitashelmchart
helm install --name nitashelmchart ./nitashelmchart --set service.type=NodePort

Step 11. Test the application
##################

Follow the onscreen instruction from helm install command to get the application url
