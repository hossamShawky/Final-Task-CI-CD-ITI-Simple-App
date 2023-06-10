pipeline {
    agent { label "iti-node" }       
    stages {
        stage('build') {
            steps {
                echo "Start Build Stage:build&Push Image"
                script {
                    if (BRANCH_NAME == "main") {
     withCredentials([usernamePassword(credentialsId: 'DockerHub', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {
                    sh """
                        
                        docker login -u ${USERNAME} -p ${PASSWORD}
                        docker build . -t hossam23/demo-app:v${BUILD_NUMBER}
                        docker push hossam23/demo-app:v${BUILD_NUMBER}
                                                    echo "Your Img.V:${BUILD_NUMBER}"
                                                    echo "${BUILD_NUMBER}" > ../buildV.txt
                    """
                } 
                    } else {
                        echo "User choose  Branch: ${BRANCH_NAME}"
                    }
                }
            }
        }
         stage ("deploy") {
       echo "Start Deploy Stage: Deploy Application"
script {
  if (BRANCH_NAME == "app") {
                        withCredentials([file(credentialsId: 'kube-credentials', variable: 'KUBECONFIG')]) { 
                               sh '''
                          export BUILD_NUMBER=$(cat ../buildV.txt)
             mv deployments/deployment.yaml deployments/deployment.yaml.tmp
      cat deployments/deployment.yaml.tmp | envsubst > deployments/deployment.yaml
                 rm -f deployments/deployment.yaml.tmp
           kubectl apply -f deployments --kubeconfig ${KUBECONFIG} -n ${BRANCH_NAME}

           echo "Dployeed Sucess"
                            '''
                } 
                    } else {
                        echo "User choose  Branch: ${BRANCH_NAME}"
                    }

}

    }
    
    }

   
}
