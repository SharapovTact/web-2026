function getNames(){
    const users = [
        { id: 1, sex: "male", name: "Nick" },
        { id: 2, sex: "female", name: "Denis" },
        { id: 3, sex: "male", name: "Fem" },
    ];
    return users.map(user => [user.sex, user.name]);
}