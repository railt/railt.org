import VueApollo from 'vue-apollo';
import client from './http/client';

export default new VueApollo({
    defaultClient: client,
    defaultOptions: {
        $loadingKey: 'loading'
    }
});
