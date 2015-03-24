# Contributing

Please take a moment to review the instructions we've put together in order to make the contribution process
easy and effective for everyone involved. They aren't perfect, so please let us know where things could be
improved.

## Issues

__Found a vulnerability? Please disclose responsibly by emailing FluxCTRL at Gmail.com.__

The [issue tracker][issues] is the best way to submit [bug reports](#bug-reports) and [feature requests]
(#feature-requests), but please respect these __golden__ rules:

- __Respect the opinion of others.__
- Please __do not__ submit support requests (use [support] channels instead).
- Please __do not__ derail or troll issues by sticking to the topic.

## Bug reports

A bug is a _demonstrable problem_ that is caused by the code in the repository. Good bug reports are
extremely helpful - __thank you!__

Before you submit a bug, please:

- Make sure you are using the latest `master` or `dev` branch in the repository, maybe the issue has
already been fixed. If not,
- Check if the issue has already been reported, and comment to let us know you are having the same
problem. If not,
- Isolate the problem to make sure that the code in the repository is _definitely_ responsible for the
issue. A test case is optional but greatly encouraged.

When reporting [issues], please include the output of `flux info`, along with a detailed description
of what you were trying to do. Here are some general rules:

- __Be specific.__ If you can do the same thing two different ways, state which one you used.
- __Be verbose.__ Give more information rather than less.
- __Be careful of pronouns.__ Don't use words like "it", or references like "the window", when it's unclear
what they mean.
- __Read what you wrote.__ Read the report back to yourself, and see if _you_ think it's clear.
- __Test one more time.__ If you have listed a sequence of actions which should reproduce the failure, try
following them yourself, to see if you missed a step.

The longer version where these were taken from can be found [here](http://www.chiark.greenend.org.uk/~sgtatham/bugs.html).

## Feature requests

We welcome great ideas, but please take a moment to find out whether or not your idea fits the philosophy
of FluxCTRL. Ask yourself why it shouldn't be implemented as a plugin instead. Don't be surprised if you
have some convincing to do, we tend to [say no a lot](http://ometer.com/features.html).

## Pull Requests

Building great software requires team effort and with that in mind, we encourage PRs and do our best to
process them as quickly as possible. We encourage contributions of all sizes, so don't hesitate to fix
typos!

For all non-trivial improvements, please include a detailed description and make sure the changes remain
focused in scope.

For more ambitious contributions, we recommend discussing your plans in an [issue] very early in the
process to avoid working on something someone else is doing already. This also gives the team and
community a chance to show interest, raise concerns and ultimately guide you in the right direction.

All new code should follow [CakePHP's coding conventions], which are very PSR-2-like, and follow the below
process to be considered for inclusion:

1. [Fork](http://help.github.com/fork-a-repo/) the project, clone your fork,
   and configure the remotes:

   ```bash
   # Clone your fork of the repo into the current directory
   git clone https://github.com/your-username/FluxCTRL
   # Navigate to the newly cloned directory
   cd FluxCTRL
   # Assign the original repo to a remote called "upstream"
   git remote add upstream https://github.com/FluxCTRL/FluxCTRL
   ```

2. If you cloned a while ago, get the latest changes from upstream:

   ```bash
   git checkout <dev-branch>
   git pull upstream <dev-branch>
   ```

3. Create a new topic branch (off the `dev` branch) to contain your feature, change, or fix:

   ```bash
   git checkout -b <topic-branch-name>
   ```

4. Commit your changes in logical chunks. Please adhere to these [git commit
   message guidelines](http://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html)
   and use Git's [interactive rebase](https://help.github.com/articles/interactive-rebase)
   feature to tidy up your commits before making them public.

5. Locally merge (or rebase) the upstream development branch into your topic branch:

   ```bash
   git pull [--rebase] upstream <dev-branch>
   ```

6. Push your topic branch up to your fork:

   ```bash
   git push origin <topic-branch-name>
   ```

7. [Open a Pull Request](https://help.github.com/articles/using-pull-requests/)
    with a clear title and description.

__IMPORTANT: By submitting a patch, you agree to allow FluxCTRL to license your work under the
[MIT license](http://opensource.org/licenses/MIT).__

[issues]:https://github.com/FluxCTRL/FluxCTRL/issues
[support]:https://github.com/FluxCTRL/FluxCTRL/blob/master/README.md#support
[CakePHP's coding conventions]:http://book.cakephp.org/3.0/en/contributing/cakephp-coding-conventions.html
