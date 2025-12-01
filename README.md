# ☁️ AWS DevOps Project: 2-Tier Architecture with CI/CD

This project deploys a secure, scalable web application on AWS using Infrastructure as Code (CloudFormation) and a CI/CD pipeline (GitHub Actions).

## 🏗 Architecture
The infrastructure is designed with security best practices:
- **VPC:** Custom network with isolated subnets.
- **Public Subnet:** Hosts the Web Server (Apache/PHP). Accessible via HTTP.
- **Private Subnet:** Hosts the Database (MySQL). No internet access; only accessible by the Web Server.
- **Security Groups:** Strict firewall rules (Port 80 for Web, Port 3306 restricted to internal traffic).

## 🚀 Deployment Pipeline
We use **GitHub Actions** for Continuous Deployment:
1. **Push to Main:** Triggers the workflow.
2. **Authenticate:** Uses AWS Credentials stored in GitHub Secrets.
3. **Deploy:** Updates the CloudFormation stack (`DevOps-Project-Stack`).

## 🛠 Usage Instructions
1. **Prerequisites:** AWS Account, GitHub Account.
2. **Setup Secrets:** Add `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, and `ALERT_EMAIL` to GitHub Actions Secrets.
3. **Deploy:** Push changes to the `main` branch.
4. **Access:** Use the URL provided in the CloudFormation Outputs.

## 📊 Monitoring
- **CloudWatch:** Monitors EC2 CPU utilization.
- **SNS:** Sends an email alert if CPU exceeds 50%.
