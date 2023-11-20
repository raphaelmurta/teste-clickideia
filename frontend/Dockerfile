FROM node:20-alpine
WORKDIR /var/www/frontend
COPY ./package.json ./
COPY .env.example .env
RUN npm install
COPY . .
CMD ["npm", "run", "start"]
