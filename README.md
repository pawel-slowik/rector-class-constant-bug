Example for [Rector issue #9343](https://github.com/rectorphp/rector/issues/9343).

# Reproduction steps

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

# Solution

The relevant Rector rule is configurable and can be set to generate code that
preserves the original behavior.

Example modified configuration:

        ->withConfiguredRule(
            StringClassNameToClassConstantRector::class,
            [
                StringClassNameToClassConstantRector::SHOULD_KEEP_PRE_SLASH => true,
            ]
        )
