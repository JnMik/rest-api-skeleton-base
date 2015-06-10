Feature:
  I want to ping the service

  # Ping request
  Scenario: : Ping the service
    When I go to  "/1.0/ping"
    Then I should receive a 200 response
    And I should receive following items:
      | status |
      | OK     |