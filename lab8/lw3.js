function uniqueElements(Array) {
    let uniqueObj = {};
    for (let i = 0; i < Array.length; i++) {
        let keysArr = Object.keys(uniqueObj);
        let isFirstEnter = false;
        for (let j = 0; j < keysArr.length; j++) {
            if (keysArr[j] === Array[i]) {
                isFirstEnter = false;
                break;
            }
        }
        if (isFirstEnter) {
            uniqueObj[Array[i]] = 1;
        }
        else{
            uniqueObj[Array[i]] = uniqueObj[Array[i]] + 1; //TODO не работает
        }
    }
    return uniqueObj;
}