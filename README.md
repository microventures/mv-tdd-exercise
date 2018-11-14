# MicroVentures Test-Driven Development Developer Candidate Exercise

## Overview

Your task is to illustrate everything described in this file through test-driven development. **Make sure that all of your tests pass.**

Keep the following in mind:

1. Commit your changes as you work!
2. As you work through the instructions, think about places that you can use dependency injection.
3. Separate your tests based on the object being tested.

## Setup

1. Create a simple test to see that phpunit is working (you'll find a file within the `/tests` directory to get you started.)
2. Add PSR-4 autoloading using a namespace of `App` and pointing to a `src` folder
3. Create a class to see that PSR-4 is working

## Instructions

We are creating an application to represent an extremely simplified version of the investment workflow at MicroVentures. Within this model, we have the concept of the following:

* Offerings (the business that an investment is asssociated with)
* Investors (an individual who invests in Offerings on the MicroVentures Platform)
* Investments (the actual money an Investor invests into an Offering)

### Offerings

* When it is created, an Offering should be given a name.
* Offerings can have many Investments, but there should be a maximum number allowed.
* The maximum number of Investments allowed is assigned when an Offering is created.
* If the the maximum number of Investments has been reached for a particular Offering and there is an attempt to add an investment to the Offering, then an Exception should be thrown.

### Investors

* An Investor should always have: `firstName`, `lastName`, `email`, `approved DEFAULT 0`
* An Investor needs to be approved before they are allowed to make an Investment
* There should be a way to find the `totalDollarsInvested` for an Investor

### Investments

* Investments should have an `amount` and `paymentMethod`
* An Investment is associated with an Offering and an Investor
