pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                echo "Start Stage:build Image"
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
                        echo "User chose ${BRANCH_NAME}"
                    }
                }
            }
        }
    }
}
