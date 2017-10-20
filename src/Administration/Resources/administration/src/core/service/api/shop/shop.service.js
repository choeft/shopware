export default function ShopService(client) {
    /**
     * Defines the return format for the API. The API can provide the content as JSON (json) or XML (xml).
     * @type {String} [returnFormat=json]
     */
    let returnFormat = 'json';

    return {
        readAll,
        readByUuid,
        updateByUuid,
        getReturnFormat,
        setReturnFormat
    };

    /**
     * @param {Number} limit - The limit of shops you want to receive
     * @param {Number} offset - Offset of the shops you want to receive
     * @returns {Promise}
     */
    function readAll(limit = 25, offset = 0) {
        return client.get(`/shop.${returnFormat}?limit=${limit}&offset=${offset}`).then((response) => {
            return response.data;
        });
    }

    /**
     * @param {String} uuid - Shop UUID
     * @returns {Promise}
     */
    function readByUuid(uuid) {
        if (!uuid) {
            return Promise.reject(new Error('"uuid" argument needs to be provided'));
        }

        return client.get(`/shop/${uuid}.${returnFormat}`).then((response) => {
            return response.data;
        });
    }

    /**
     * Updates a single shop. Partial updates are supported using the {@param payload}.
     *
     * @param {String} uuid - Shop UUID
     * @param {Object} payload - Changeset
     * @returns {Promise}
     */
    function updateByUuid(uuid, payload) {
        if (!uuid) {
            return Promise.reject(new Error('"uuid" argument needs to be provided'));
        }

        return client.patch(`/shop/${uuid}.json`, payload).then((response) => {
            return response.data;
        });
    }

    /**
     * Getter for the return format of the service.
     * @returns {string} [returnFormat]
     */
    function getReturnFormat() {
        return returnFormat;
    }

    /**
     * Setter for the return format of the service.
     * @param {String} newReturnFormat
     * @returns {String}
     */
    function setReturnFormat(newReturnFormat) {
        returnFormat = newReturnFormat;

        return returnFormat;
    }
}