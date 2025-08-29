1. Install Rector:

        docker run -it -u $(id -u) -v "$PWD:/app" $(docker build -q .) composer install

2. Run the example script:

        docker run -u $(id -u) -v "$PWD:/app" $(docker build -q .) php src/test.php

   Output of the original example script:

        \App\Foo\Bar

3. Apply the `StringClassNameToClassConstantRector` rule:

        docker run -it -u $(id -u) -v "$PWD:/app" $(docker build -q .) php vendor/bin/rector process

4. Rerun the example script:

        docker run -u $(id -u) -v "$PWD:/app" $(docker build -q .) php src/test.php

   Output of the example script modified by Rector:

        App\Foo\Bar
