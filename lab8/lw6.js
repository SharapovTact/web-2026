function mapObject(obj, callback) {
    const newObj = {};
    for (const key in obj) {
        newObj[key] = callback(obj[key]);
    }
    return newObj;
}
