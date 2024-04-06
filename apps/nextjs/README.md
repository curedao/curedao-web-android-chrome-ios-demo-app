# FDAi Next.js Example App

This is an example app that demonstrates how to use the FDAi SDK with Next.js.

## Getting Started

Copy `.env.example` to `.env.local` file in the root of the project. The following environment variables are supported:

[https://builder.fdai.earth](https://builder.fdai.earth)
- `FDAI_CLIENT_ID`: The client ID of your FDAi app.
- `FDAI_CLIENT_SECRET`: The client secret of your FDAi app.


First, install the dependencies:

```bash
npm install
```

Then, run the development server:

```bash
npm run dev
```

Then start the database with [docker-compose](https://docs.docker.com/desktop/):

```bash
docker-compose up
```

Generate the Prisma client:

```bash
npx prisma generate
```

Run the migrations:

```bash
npx prisma migrate dev
```

Open [http://localhost:3000](http://localhost:3000) with your browser to see the result.
