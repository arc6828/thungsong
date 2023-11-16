let str = 'title: U60d0f0345820dae230b04e5c79971d0e; description : 2023-11-15 17:31:11';
let reg = /(?<=description : ).*/g
let d = str.match(reg)[0];
console.log(d);