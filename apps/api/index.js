var express = require('express'),
    app = express(),
    bodyParser = require('body-parser'),
    morgan = require('morgan');
const path = require('path');
const { initialize } = require('@oas-tools/core');
const mcache = require('memory-cache');
const proxy = require('express-http-proxy');
const http = require("http");
const {numberFormat} = require("underscore.string");
var cache = (duration) => {
    return (req, res, next) => {
        let key = '__express__' + req.originalUrl || req.url
        let cachedBody = mcache.get(key)
        if (cachedBody) {
            res.send(cachedBody)
        } else {
            res.sendResponse = res.send
            res.send = (body) => {
                mcache.put(key, body, duration * 1000);
                res.sendResponse(body)
            }
            next()
        }
    }
}

app.use(morgan('dev'));
// CORS (Cross-Origin Resource Sharing) headers to support Cross-site HTTP requests
app.use(function(req, res, next) {
    // Don't allow cross-origin to prevent usage of client id and secret
    // res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST');
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With, content-type, Authorization, X-Client-ID, X-Client-Secret');
    next();
});

const proxyUrl = process.env.API_URL || 'https://app.quantimo.do/api';
var serverPort = 5000;
if(process.env.PORT){
    serverPort = numberFormat(process.env.PORT);
}
app.use('/#app', express.static(path.join(__dirname, '../src')))
app.use('/docs', express.static(path.join(__dirname, '../src/docs')))
// app.use('*', proxy(proxyUrl));
//app.use('/api', proxy(apiUrl+'/api'));
app.use('/api', proxy(proxyUrl, {
    proxyReqOptDecorator: function(proxyReqOpts, srcReq) {
        // you can update headers
        proxyReqOpts.headers['X-Client-ID'] = process.env.QUANTIMODO_CLIENT_ID;
        proxyReqOpts.headers['X-Client-Secret'] = process.env.QUANTIMODO_CLIENT_SECRET;
        // you can change the method
        //proxyReqOpts.method = 'GET';
        return proxyReqOpts;
    }
}));
app.use(bodyParser.urlencoded({ extended: true }));  // must come after any proxy calls, or it fucks up the body
app.use(bodyParser.json());

app.use(express.json({limit: '50mb'}));

const config = {
    middleware: {
        security: {
            auth: {
                access_token: () => { /* no-op */ },
                bearerAuth: () => {  },
                client_id: () => { /* no-op */ },
                curedao_oauth2: () => { /* no-op */ },
            }
        }
    }
}
initialize(app, config).then(() => {
    let server = http.createServer(app);
    server.listen(serverPort, () => {
        console.log("\nApp running at http://localhost:" + serverPort + " in " + app.get('env') + " mode");
        console.log("________________________________________________________________");
        if (config.middleware.swagger?.disable !== false) {
            console.log("API docs (Swagger UI) available on http://localhost:" + serverPort + '/docs');
            console.log("________________________________________________________________");
        }
    });
});