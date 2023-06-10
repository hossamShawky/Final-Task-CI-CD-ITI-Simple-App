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
                        ls
                        docker login -u ${USERNAME} -p ${PASSWORD}
                        docker build . -t hossam23/demo-app:v${BUILD_NUMBER}
                        docker push hossam23/demo-app:v${BUILD_NUMBER}
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
     withCredentials([usernamePassword(credentialsId: 'DockerHub', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {
                    sh """
                        ls
                        docker login -u ${USERNAME} -p ${PASSWORD}
                        docker build . -t hossam23/demo-app:v${BUILD_NUMBER}
                        docker push hossam23/demo-app:v${BUILD_NUMBER}
                    """
                } 
                    } else {
                        echo "User choose  Branch: ${BRANCH_NAME}"
                    }

}

    }
    
    }

   
}
