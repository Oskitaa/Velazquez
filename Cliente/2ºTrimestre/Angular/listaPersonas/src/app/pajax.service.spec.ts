import { TestBed } from '@angular/core/testing';

import { PajaxService } from './pajax.service';

describe('PajaxService', () => {
  let service: PajaxService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(PajaxService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
