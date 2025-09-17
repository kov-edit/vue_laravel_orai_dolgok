new Vue ({
    el: '#app',
    data : {
        hello: 'Hello World',
        /*reverseHello: '',*/
        tooltip: 'You are seeing a tooltip!',
        myStyle: 'blueText',
        myStyle1: 'redText',
        myStyle2: 'greenText',
        color: 'blueText',
        fontWeight: 'boldText',
        styleObject: {
            color: 'hotpink',
            fontWeight: 'bold',
            fontSize: '20px'
        },
        myHeader: '<h2>Dynamic Header</h2>',
        showHelloWorld: true,
        a: 15,
        fruits: ['Apple', 'Cherry', 'Orange'],
        person: {
            firstName: 'Kristóf',
            lastName: 'Kiss',
            age: 30
        },
        counter: 0,
       mouseEventStatus: 'Start',
       inputText: 'Kreatív szöveg',
    },
    methods: {
        /*reverseHello: function() {
            return this.hello.split('').reverse().join('');
        },*/
        capitalizeHello: function() {
            return this.hello.toUpperCase();
        },
        add(a, b) {
            return a + b;
        },
         addOne(event) {
            /*if (event) {
                event.preventDefault();
            }*/
            this.counter += 1;
        },
        addMore(value) {
            this.counter += value;
        },
        performMouseOver() {
            this.mouseEventStatus = 'Kurzor rajta';
        },
        performMouseOut() {
            this.mouseEventStatus = 'Kurzor nincs rajta';
        }
    },
    computed: {
        reverseHello() {
            return this.hello.split('').reverse().join('');
        }
        
    },
    
})