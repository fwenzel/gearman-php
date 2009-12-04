Improvements:
-------------
* Need a way to run separate workers, so that job A does not block on job B.
* Encourage daemonizing the workers, e.g. with supervisord, so they are
  respawned in case of failure.

Known Bugs
----------
* Requires both client and workers to use Net_Gearman. That defeats one of the
  advantages of gearman: the ability to run clients in a different language
  than the workers.
