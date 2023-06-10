pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                echo "Start Stage:build Image"
                script {
                    if (BRANCH_NAME == "main") {
                        sh '''
                            echo "Welcome in build: ${BUILD_NUMBER}"
                        '''
                    } else {
                        echo "User chose ${BRANCH_NAME}"
                    }
                }
            }
        }
    }
}
