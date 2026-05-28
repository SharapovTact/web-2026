function uniqueElements(array) {
    let uniqueObj = {};
    for (let i = 0; i < array.length; i++) {
        if (uniqueObj[array[i]] === undefined){
            uniqueObj[array[i]] = 1;
        }
        else {
            uniqueObj[array[i]] = uniqueObj[array[i]] + 1;
        }
    }
    return uniqueObj;
}