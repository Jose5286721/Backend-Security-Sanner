const a = tf.tensor([[1, 2], [3, 4]]);
console.log('shape:', a.shape);
a.print();

const shape = [2, 2];
const b = tf.tensor([1, 2, 3, 4], shape);
console.log('shape:', b.shape);
b.print();

const a1= tf.tensor([[1, 2], [3, 4]], [2, 2], 'int32');
console.log('shape:', a1.shape);
console.log('dtype', a1.dtype);
a1.print();

const x = tf.tensor([1, 2, 3, 4]);
const y = x.square();  // equivalent to tf.square(x)
y.print();