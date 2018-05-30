import http from "./http";
import cache from "./cache";

import {ApolloClient} from "apollo-client";


export default new ApolloClient({
    link: http,
    cache: cache,
    defaultOptions: {
        query: {
            fetchPolicy: 'cache-first',
            errorPolicy: 'all',
        }
    },
    connectToDevTools: process.env.NODE_ENV !== 'production',
    shouldBatch: true,
    dataIdFromObject: o => o.id
});
