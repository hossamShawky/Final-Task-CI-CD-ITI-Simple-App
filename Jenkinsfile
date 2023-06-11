pipeline {
    agent any       
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
steps{
           echo "Start Deploy Stage: Deploy Application"
script {
  if (BRANCH_NAME == "app") {
                        withCredentials([file(credentialsId: 'kube-credentials', variable: 'KUBECONFIG')]) { 
                               sh '''
                          export BUILD_NUMBER=$(cat ../buildV.txt)
             mv deployments/deployment.yml deployments/deployment.yml.tmp
      cat deployments/deployment.yml.tmp | envsubst > deployments/deployment.yml
                 rm -f deployments/deployment.yml.tmp
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

   
}
