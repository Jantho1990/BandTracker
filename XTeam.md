# X-Team Questions and Some Answers
The following file is to keep track of potential answers to the questions
X-Team posed. Once the project is done, the best answers will be selected
and provided to them.

## Debugging


## Testing

### Testing By Wishful Thinking
Because faithful TDD expects you to write the tests before you write the code, a way to plan your code while still writing tests first is to do something called "Testing By Wishful Thinking". In the test, you write the code you wish existed, and when the test fails it will tell you that you need to implement the code needed to make your wish come true.

Times I used this:
- canViewBand: In the original code, I knew I wanted to change my implementation of how the $band->still_active variable gets rendered to the page to use an accessor. I wrote my test using the name of the mutator I wanted ($band->stillActiveString). It failed, of course, and I then implemented the feature in the model.


## Best Practices

### Using Mutators/Accessors to get modified values of model attributes.
Instead of modifying model values in the controller or the view, we can use mutators and accessors to set/get attributes using whatever logic needed.

Times I did this:
- $band->stillActiveString