# Node.js Dockerfile for Vite/Frontend
FROM node:20-alpine

WORKDIR /var/www/shopping-list

COPY package*.json ./

RUN npm install

COPY . .

CMD ["npm", "run", "dev"]
