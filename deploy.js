import * as AWS from "@aws-sdk/client-elastic-beanstalk";
const client = new AWS.ElasticBeanstalk({ region: "REGION" });

// async/await.
try {
  const data = await client.updateApplication(params);
  // process data.
} catch (error) {
  // error handling.
}

// Promises.
client
  .abortEnvironmentUpdate(params)
  .then((data) => {
    // process data.
  })
  .catch((error) => {
    // error handling.
  });

// callbacks.
client.abortEnvironmentUpdate(params, (err, data) => {
  // process err and data.
});