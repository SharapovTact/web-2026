function mergeObjects(obj1, obj2) {
    let newObj = {};
    for (let key in obj1) {
        if (obj2[key] === undefined ) {
            newObj[key] = obj1[key];
        }
        else {
            newObj[key] = obj2[key];
        }
    }
    return newObj;
}